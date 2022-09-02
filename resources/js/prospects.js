request_prospects = {
    get: ()=>{
        
      

        // fetch('https://massivehome.com.mx/api/v1/public/expo/prospects', options)
        // .then(response => response.json())
        // .then(response => console.log(response))
        // .catch(err => console.error(err));

        let headers = new Headers();

        headers.append('Content-Type', 'application/json');
        headers.append('Accept', 'application/json');
        //headers.append('Authorization', 'Basic ' + base64.encode(username + ":" +  password));
        headers.append('Origin','http://127.0.0.1:8000/');

        fetch("https://massivehome.com.mx/api/v1/public/expo/prospects", {
            mode: 'no-cors',
            method: 'GET',
            headers: headers
        })
        .then(response => response.json())
        .then(json => console.log(json))
        .catch(error => console.log('Authorization failed: ' + error.message));
        
    }
}