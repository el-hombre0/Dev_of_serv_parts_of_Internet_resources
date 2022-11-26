async function getProjects(){
    let res = await fetch('https://jsonplaceholder.typicode.com/posts'); // откуда получаем данные
    let projects = await res.json(); // превращаем полученные данные в json ajhvfn

    console.log(projects);
    projects.forEach(element => { // перебор полученных элементов
      // Выбираем селектор, куда будем загружать данные
        document.querySelector('.projects-list').innerHTML += ` 
        <div class="card container-sm col-6">
          <div class="card-body">
            <h5 class="card-title">${element.title}</h5>
            <p class="card-text">${element.body}</p>
            <a href="#" class="card-link">Продолжение</a>
          </div>
        </div>
        `
    });

}
getProjects();