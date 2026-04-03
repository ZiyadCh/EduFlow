import { createCourseCard } from "./course-card.js";
import token from "../auth/token.js";
import getUser from "../auth/getUser.js";

async function fetchCourses() {
    const container = document.getElementById("container");
    const user = getUser();

    const response = await fetch(
        `/api/v1/courses?user_id=${encodeURIComponent(user.id)}`,
    );

    console.log(user.id);
    if (!response.ok) {
        console.log("an error occured!!!!");
        return;
    }
    const data = await response.json();
    container.textContent = "";
    console.log(data);

    data.forEach((course) => {
        const courseCard = createCourseCard(course);
        container.appendChild(courseCard);
    });
}
window.addEventListener("DOMContentLoaded", fetchCourses);
