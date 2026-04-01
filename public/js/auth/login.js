async function login(e) {
    e.preventDefault();
    const formData = new FormData(form);

    const response = await fetch("api/v1/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            email: formData.get("email"),
            password: formData.get("password"),
        }),
    });

    const data = await response.json();
    if (!response.ok) {
        console.log(data);
        return;
    }

    localStorage.setItem("token", data.access_token);
    window.location.href = "courses";
}

const form = document.getElementById("loginForm");
form.addEventListener("submit", login);
