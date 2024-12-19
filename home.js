$(() => {

    $("#sidemenuul>a:eq(0)").addClass("sidemenu-li");  



    const apiUrl = 'https://api.nasa.gov/planetary/apod?api_key=p4LNuIFLAsWVApla3uONHstMGkErRN2A2eutkrde';

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

            document.getElementById('apod-parent').innerHTML +=`
             <img id="apod-image" src='${data.url}' ></img>
    <div>
        <h5 id="apod-date">${data.date}</h5>
        <h2>Astronomy Picture of the Day</h2>
        <h4 id="apod-title">${data.title}</h4>
        <p id="apod-explanation">${data.explanation}</p>
    </div>
            `;
        })
        .catch(error => {
          console.log(error);
        });
});
