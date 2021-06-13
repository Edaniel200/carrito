export class callDocument{

	constructor(url, data){
		console.log("constructor");
		this.data = data;
		this.url = url;
		this.makeRequest();
	}
	async makeRequest(){

		let resProcess = await fetch(this.url, {
 		method : "POST",
 		body : this.data
 		});

 		this.response = await resProcess.json();
	}

	getResponse(){
		return this.response;
	}

}


