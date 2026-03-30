async function fetchCourses() {
    const container = document.getElementById("container");
    const response = await fetch("/api/v1/courses");
    if (!response.ok) {
        console.log("ereeur");
    }
    const data = await response.json();
    console.log(data);
}

fetchCourses();
