<template>
  <div class="home">
      <TodosComponent></TodosComponent>
  </div>
</template>

<script>
import TodosComponent from '@/components/TodosComponent.vue';
export default {
  name: 'HomeView',
  components: {
    TodosComponent
  }
}
</script>
