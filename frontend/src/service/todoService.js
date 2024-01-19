import axios from "axios";

const ApiClient = axios.create({
  baseURL: "http://localhost:8000/api",
  withCredentials: false,
  headers: {
    accept: "application/json",
    "content-type": "application/json",
  },
});

export default {
    getTodos(){
        return ApiClient.get("/todos");
    },
    deleteTodo(id){
        return ApiClient.delete("/deleteTodo/"+id);
    },
    AddTodo(todo){
        return ApiClient.post("/addTodo",todo);
    },
    getTodoById(id){
      return ApiClient.get("/getTodoById/"+id);
    },
    UpdateTodo(id,todo){
      return ApiClient.put("/UpdateTodo/"+id,todo);
    }
};