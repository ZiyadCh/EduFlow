const token = localStorage.getItem("token");
const user = JSON.parse(localStorage.getItem("user"));

const authenticated = !!token && token !== "null" && token !== "undefined";

if (!authenticated && !window.location.pathname.includes("/login")) {
    window.location.href = "/login";
}

export { token, user };
export default authenticated;
