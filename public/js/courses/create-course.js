const token = localStorage.getItem("token");
if (!token) {
    console.error("No token, redirecting to login");
    window.location.href = "/login";
    return;
}
