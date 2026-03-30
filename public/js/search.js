async function searchCourse() {
    const searchBar = document.getElementById("searchCourse");

    const response = await fetch("api/v1/courses");
    const data = await response.json();

    //the value from the search bar
    const value = searchBar.value;
    const results = data.filter((course) =>
        course.name.includes(value).toLowerCase(),
    );
    console.log(results);
}

const searchBtn = document.getElementById("searchBtn");
searchBtn.addEventListener("click", searchCourse);
