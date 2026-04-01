import authenticated, { token } from "../auth/user.js";

async function createCourse() {
    const request = new FormData(form);
    const response = await fetch("api/v1/courses", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: request.get("name"),
            desc: request.get("desc"),
            prix: request.get("prix"),
            field: request.get("field"),
        }),
    });
    if (!response.ok) {
        console.log("erroro");
    }
}
const form = document.getElementById("courseForm");
form.addEventListener("submit", createCourse);
