import { token } from "../auth/get-token.js";

async function createCourse(e) {
    e.preventDefault();
    const request = new FormData(form);
    const response = await fetch("/api/v1/courses", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${token}`,
        },
        body: JSON.stringify({
            name: request.get("name"),
            desc: request.get("desc"),
            price: request.get("price"),
            field: request.get("field"),
        }),
    });
    if (!response.ok) {
        console.log("erroro");
    }
    console.log(response);
}
const form = document.getElementById("courseForm");
form.addEventListener("submit", createCourse);
