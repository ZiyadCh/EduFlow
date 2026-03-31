async function register(e) {
    e.preventDefault();

    const formData = new FormData(form);

    const response = await fetch("/api/v1/register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },

        body: JSON.stringify({
            nom: formData.get("nom"),
            prenom: formData.get("prenom"),
            role: formData.get("role"),
            email: formData.get("email"),
            password: formData.get("password"),
        }),
    });

    if (!response) {
        console.log("error");
    }
    const data = await response.json();
    console.log(data);
    localStorage.setItem("token", data.access_token);
}

const form = document.getElementById("registerForm");
form.addEventListener("submit", register);
