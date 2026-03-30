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
            "relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm";

        //bouton de sauvegarde
        const favBtn = document.createElement("button");
        favBtn.className =
            "absolute top-4 right-4 text-slate-300 hover:text-red-500 text-xl";
        favBtn.textContent = "❤";

        //container div
        const contentDiv = document.createElement("div");
        contentDiv.className = "flex flex-col h-full";

        //nom d'ensagnait
        const teacherName = document.createElement("p");
        teacherName.className = "text-xs font-bold text-blue-600 mb-1";
        teacherName.textContent = `Ensaignat: ${course.teacher.user.nom} ${course.teacher.user.prenom}`;

        //titre du cours
        const title = document.createElement("h3");
        title.className = "text-lg font-extrabold text-slate-900 mb-6";
        title.textContent = course.topic;

        //prix
        const priceSpan = document.createElement("span");
        priceSpan.className = "text-xl font-black text-slate-900";
        priceSpan.textContent = course.price + " DH";

        //btn inscription
        const enrollBtn = document.createElement("button");
        enrollBtn.className =
            "absolute bottom-4 right-4 text-blue-600 border border-b-blue-400 rounded-2xl p-2 hover:bg-blue-600 hover:text-white transition text-xl";
        enrollBtn.textContent = "Inscrire";

        contentDiv.appendChild(teacherName);
        contentDiv.appendChild(title);
        contentDiv.appendChild(priceSpan);

        card.appendChild(favBtn);
        card.appendChild(contentDiv);
        card.appendChild(enrollBtn);

        container.appendChild(card);
    });
}

window.addEventListener("DOMContentLoaded", fetchCourses);
