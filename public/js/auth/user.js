async function user() {
    const token = localStorage.getItem("token");
    if (!token) {
        console.error("No token, redirecting to login");
        window.location.href = "/login";
        return;
    }

    try {
        const response = await fetch("/api/v1/user", {
            headers: {
                Authorization: `Bearer ${token}`,
                Accept: "application/json",
            },
        });

        if (!response.ok) {
            console.error("Auth failed:", response.status);
            return;
        }

        const user = await response.json();
        console.log("Logged in user:", user);
        document.getElementById("username").textContent = user.nom;
    } catch (err) {
        console.error("Network or CORS error:", err);
    }
}
user();
