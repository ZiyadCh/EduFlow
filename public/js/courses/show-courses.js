async function fetchCourses() {
    const container = document.getElementById("container");
    const response = await fetch("/api/v1/courses");
    if (!response.ok) {
        console.log("an error occured!!!!");
        return;
    }
    const data = await response.json();
    container.textContent = "";

    courses.forEach((courses) => {
        const courseCard = createCourseCard(course);
    });
}
window.addEventListener("DOMContentLoaded", fetchCourses);
