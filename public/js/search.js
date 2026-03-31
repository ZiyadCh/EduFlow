async function searchCourse() {
    const query = document.getElementById("searchCourse").value;

    const response = await fetch(
        `api/v1/courses?name=${encodeURIComponent(query)}`,
    );
    const results = await response.json();

    renderResults(results);
}

const searchBtn = document.getElementById("searchBtn");
searchBtn.addEventListener("click", searchCourse);
