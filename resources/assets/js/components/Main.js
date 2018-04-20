import React, { Component } from 'react';
import ReactDOM from 'react-dom';
 
class Main extends Component {
 
  constructor(props) {
   
    super(props);
    this.state = {
        id:null,
        type:"",
        status:"",
    }
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleSubmit(event){
    event.preventDefault();
    fetch('/api/developer', {
     method: 'post',
     headers: {
        'Content-Type':'application/json'
        },
     body: {
      "id": this.id.value,
      "password": this.password.value
     }
    });
  }

  render() {
      if(this.state.id!=null){
          return(
            <h1>hdshs{this.state.id}</h1>
          );
      }
      else{
        return (
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h4>Developer{this.state.id}</h4>
                    <form onSubmit={this.handleSubmit}>
                        <input ref={(ref) => {this.id = ref}} type="text" name="id" placeholder="Developer ID" class="form-control"/>
                        <br/>
                        <input ref={(ref) => {this.password = ref}} type="password" name="password" placeholder="Password" class="form-control"/>
                        <br/>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-sm-6">33</div>
            </div> 
           
        );
      }
  }
}



export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}