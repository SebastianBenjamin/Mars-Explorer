$(() => {
    $('#loader').css('display','flex');
   
    
 
    const apiUrl = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=p4LNuIFLAsWVApla3uONHstMGkErRN2A2eutkrde';

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const totalPhotos = data.photos.length;
            console.log(totalPhotos); 
            
    
            const randomIndices = new Set();
            while (randomIndices.size < 50) {
                const randomIndex = Math.floor(Math.random() * totalPhotos);
                randomIndices.add(randomIndex);
            }

            
            randomIndices.forEach(index => {
                const photo = data.photos[index];
                document.getElementById('apod-parent').innerHTML += `
                <div>
                    <img src='${photo.img_src}' id='imgg' alt='Mars Image${index}' style='width:400px;' title='${photo.camera.name} - ${photo.camera.full_name} - ${photo.earth_date}'/>
<p>${photo.camera.name} - ${photo.camera.full_name} - ${photo.earth_date}</p>
<p>Launched : ${photo.rover.launch_date}  Landed : ${photo.rover.landing_date}</p>
 <p>Status : ${photo.rover.status}</p>

                </div>
                
                    `;
        $('#loader').css('display','none');

        })})
        .catch(error => {
            console.log(error);
        $('#loader').css('display','none');

        });
});
