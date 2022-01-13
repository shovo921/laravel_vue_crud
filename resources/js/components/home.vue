<template>
 <div class="container">



  
  <form class="mt-10"  >
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" v-model="value.frist_name">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control"  v-model="value.last_name">
  </div>

  <button @click.prevent="updatefrom($event)" v-if="upflag" type="submit" class="btn bg-success">Update</button>
  <button @click.prevent="reset($event)" v-if="upflag" type="submit" class="btn bg-success">Reset</button>
  <button @click.prevent="handefrom($event)" v-if="!upflag" type="submit" class="btn bg-success">Submit</button>
</form>

 <table class="table">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <tr v-for="data in info" :key="data.id" >
      <th scope="row">{{data.id}}</th>
      <td>{{data.frist_name}}</td>
      <td>{{data.last_name}}</td>
      <td><button class="bg-primary" @click="showdata(data.id)" >Edit</button> <button  @click="deletedata(data.id)" class="bg-danger">Delete</button></td>
    </tr>
    
  </tbody>
</table>

 </div>




</template>

<script>

import {ref} from 'vue';
import axios from 'axios';

export default {
	name: "home",
	data() {
		return {
			upflag: false,
      info:[],
      value:{},

		};
	},
  methods:{
    handefrom (e)
    {
    
     let values=this.value;

      if(this.value.lastname != '' && this.value.fristname != '')
      {
        console.log(values);
          axios.post('http://localhost:8000/api/postdata',values)
          .then(function(response){
           console.log(response.data.status);
           
          }

      );

     this.value.frist_name='';
     this.value.last_name='';
     this.getAllItems();
     

    }
    },
    updatefrom(){
      let itself=this;
      this.upflag=false;
      axios.post('http://localhost:8000/api/update/'+itself.value.id,itself.value)
      this.getAllItems();
      this.reset();
    
    },
     deletedata(id){
      let itself=this;
     axios.get('http://localhost:8000/api/delete/'+id)
     .then(function(response){
      console.log(response.data);
    })
       this.getAllItems();
    },
    
    reset(){
      this.value={};
   
    },
    getAllItems(){
          axios.get('http://localhost:8000/api/getdata')
      
          .then(response => (this.info = response.data))
    },
    showdata(id){
    let itself=this;
      console.log(id);
      axios.get('http://localhost:8000/api/show/'+id)
      .then(function(response){
        itself.value=response.data;
        console.log(response.data);
        itself.upflag=true;
      })
    }
    
  },
  
     mounted () {
       this.getAllItems();
    
  },
};


</script>

<style scoped>

.mt-10{
  margin-bottom: 30px;
  width: 500px;
}
</style>
