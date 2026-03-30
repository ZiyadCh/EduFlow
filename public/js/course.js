async function fetchCourses() {
    const container = document.getElementById("container");
    const response = await fetch("/api/v1/courses");
    if (!response.ok) {
        console.log("ereeur");
        return;
    }
    const data = await response.json();
    container.innerHTML = data
        .map(
            (course) => `
    <div class='relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm'>

                <button class='absolute top-4 right-4 text-slate-300 hover:text-red-500 text-xl'>
                    ❤
                </button>

                <div class='flex flex-col h-full'>
                    <p class='text-xs font-bold uppercase text-blue-600 mb-1'>
                        Instructor ID: ${course.teacher_id}
                    </p>

                    <h3 class='text-lg font-extrabold text-slate-900 mb-6'>
                        ${course.topic}
                    </h3>

                    <div class='mt-auto pt-4 border-t border-slate-50'>
                        <span class='text-xl font-black text-slate-900'>
                            ${course.price}
                        </span>
                    </div>
                </div>
            </div>`,
        )
        .join("");
    console.log(data);
}

fetchCourses();
