import { createCourseCard } from "./course-card.js";

async function searchCourse() {
    const query = document.getElementById("searchCourse").value;
    const container = document.getElementById("container");

    const response = await fetch(
        `/api/v1/courses?name=${encodeURIComponent(query)}`,
    );
    if (!response) {
        console.log("error");
    }

    console.log(response);
    const courses = await response.json();
    console.log(courses);
    container.innerHTML = "";
    courses.forEach((course) => {
        const card = createCourseCard(course);
        container.appendChild(card);
    });
}

const searchBtn = document.getElementById("searchBtn");
searchBtn.addEventListener("click", searchCourse);
