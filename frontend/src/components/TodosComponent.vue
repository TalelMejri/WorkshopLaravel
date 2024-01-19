<template>
    <div>
         <h1 class="text-center py-4 mt-2">Crud Todo</h1>
          <div class="container">
             <form @submit.prevent="AddTodo" class="shadow rounded p-2" v-if="edit==false">
                <h3 class="text-center">ADD TODO</h3>
                <div class="mb-2">
                     <input type="text" class="form-control" v-model="title" placeholder="Enter Title">
                </div>
                <div class="mb-2">
                     <input type="text" class="form-control" v-model="description" placeholder="Enter description">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Add</button>
                </div>
             </form>
             <form @submit.prevent="UpdateTodo" class="shadow rounded p-2"  v-else>
                <h3 class="text-center">Update TODO</h3>
                <div class="mb-2">
                     <input type="text" class="form-control" v-model="title" placeholder="Enter Title">
                </div>
                <div class="mb-2">
                     <input type="text" class="form-control" v-model="description" placeholder="Enter description">
                </div>
                <div class="text-center">
                    <button class="btn btn-warning mx-2" type="submit">Update</button>
                    <button class="btn btn-secondary" @click="refresh()">annuler</button>
                </div>
             </form>
          </div>
          <div class="container mt-5">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>title</th>
                         <th>Description</th>
                         <th>Operation</th>
                     </tr>
                 </thead>
                 <tbody>
                    <tr v-for="todo in todos" :key="todo.id">
                        <td>{{ todo.id }}</td>
                        <td>{{ todo.title }}</td>
                        <td>{{ todo.description }}</td>
                        <td class="d-flex gap-2">
                            <button class="btn btn-danger" @click="deletetodo(todo.id)">Delete</button>
                            <button class="btn btn-warning" @click="ShowUpdate(todo.id)">Edit</button>
                        </td>
                    </tr>
                 </tbody>
             </table>
          </div>
    </div>
</template>

<script>
import todosService from "../service/todoService.js"
export default {
    created(){
        this.getTodos();
    },
    data(){
        return{
            todos:[],
            title:"",
            description:"",
            edit:false,
            idTodo:null
        }
    },
    components:{

    },
    methods:{
        refresh(){
            this.title="";
            this.description="";
            this.idTodo="";
            this.edit=false;
        },
        ShowUpdate(id){
            this.idTodo=id;
            this.edit=true;
            todosService.getTodoById(id).then((res)=>{
                this.title=res.data.data.title;
                this.description=res.data.data.description;
            })
        },
        AddTodo(){
            todosService.AddTodo(
                {
                    titre:this.title,
                    description:this.description
                }
            ).then((res)=>{
                this.getTodos();
                this.title="";
                this.description="";
            })
        },
        UpdateTodo(){
            todosService.UpdateTodo(this.idTodo,
                {
                    titre:this.title,
                    description:this.description
                }
            ).then((res)=>{
                     this.getTodos();
                     this.refresh();
            })
        },
        getTodos(){
            todosService.getTodos().then((res)=>{
                  this.todos=res.data.data;
            })
        },
        deletetodo(id){
            todosService.deleteTodo(id).then((res)=>{
                 this.getTodos();
            })
        }
    }
}
</script>