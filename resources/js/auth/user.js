import token from "../auth/token.js";
if (!token) {
    console.error("No token, redirecting to login");
    window.location.replace("/login");
}
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

        const userData = await response.json();
        const name = document.getElementById("username");

        name.textContent = userData.nom;
    } catch (err) {
        console.error("Network or CORS error:", err);
    }
}

user();
