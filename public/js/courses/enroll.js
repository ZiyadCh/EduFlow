import token from "../auth/token.js";
import getUser from "../auth/getUser.js";
async function enrollInCourse(courseId) {
    try {
        const response = await fetch(`/api/enroll/${courseId}`, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: `Bearer ${token}`,
            },
        });

        const data = await response.json();

        if (response.ok) {
            window.location.href = data.checkout_url;
        } else {
            alert(`Error: ${data.error || "Something went wrong"}`);
        }
    } catch (error) {
        console.error("Network Error:", error);
        alert("Failed to connect to the server.");
    }
}
const enrollBtn = document.getElementById("enrollBtn");
enrollBtn.addEventListener("click", enrollInCourse);
