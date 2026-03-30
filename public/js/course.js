async function fetchCourses() {
    const container = document.getElementById("container");
    const response = await fetch("/api/v1/courses");
    if (!response.ok) {
        console.log("an error occured!!!!");
        return;
    }
    const data = await response.json();
    container.textContent = "";

    data.forEach((course) => {
        const card = document.createElement("div");
        card.className =
            "relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm transition-all duration-300";

        const favBtn = document.createElement("button");
        favBtn.className =
            "absolute top-4 right-4 text-slate-300 hover:text-red-500 text-xl";
        favBtn.textContent = "❤";

        const contentDiv = document.createElement("div");
        contentDiv.className = "flex flex-col h-full";

        const teacherName = document.createElement("p");
        teacherName.className = "text-xs font-bold text-blue-600 mb-1";
        teacherName.textContent = `${course.teacher.user.nom} ${course.teacher.user.prenom}`;

        const title = document.createElement("h3");
        title.className = "text-lg font-extrabold text-slate-900";
        title.textContent = course.name;

        const field = document.createElement("h2");
        field.className = "text-sm font-medium text-slate-500 mb-2";
        field.textContent = course.field;

        const description = document.createElement("p");
        description.className =
            "hidden text-sm text-slate-600 my-4 border-l-2 border-blue-100 pl-3 italic";
        description.textContent = course.desc;

        const viewMoreBtn = document.createElement("button");
        viewMoreBtn.className =
            "text-xs font-bold text-blue-500 hover:underline text-left mb-4 w-fit";
        viewMoreBtn.textContent = "Voir plus ▼";

        viewMoreBtn.onclick = () => {
            const isHidden = description.classList.contains("hidden");
            description.classList.toggle("hidden");
            viewMoreBtn.textContent = isHidden ? "Voir moins ▲" : "Voir plus ▼";
        };

        const priceSpan = document.createElement("span");
        priceSpan.className = "text-xl font-black text-slate-900 mt-2";
        priceSpan.textContent = course.price + " DH";

        const enrollBtn = document.createElement("button");
        enrollBtn.className =
            "absolute bottom-4 right-4 text-blue-600 border border-blue-400 rounded-xl px-4 py-1 hover:bg-blue-600 hover:text-white transition text-sm font-bold";
        enrollBtn.textContent = "Inscrire";

        //appending
        contentDiv.appendChild(teacherName);
        contentDiv.appendChild(title);
        contentDiv.appendChild(field);
        contentDiv.appendChild(viewMoreBtn);
        contentDiv.appendChild(priceSpan);
        contentDiv.appendChild(description);

        card.appendChild(favBtn);
        card.appendChild(contentDiv);
        card.appendChild(enrollBtn);

        container.appendChild(card);
    });
}
window.addEventListener("DOMContentLoaded", fetchCourses);
