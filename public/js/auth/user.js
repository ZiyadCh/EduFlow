//getting user info function
async function user() {
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
        const name = document.getElementById("username");

        name.textContent = user.nom;
    } catch (err) {
        console.error("Network error:", err);
    }
}

//logout
function logout() {
    localStorage.removeItem("token");
    window.location.href = "/login";
}
user();
