<template>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="flex justify-center font-bold mx-4 my-2 text-center">{{content}}</h1>
                <div class="flex justify-center">
                    <label class="my-2 text-center">1<br>not at all</label>
                <input required class="m-2" type="radio" id="1" :name="question_id" value="1" @click="newValue.value = 1" @change="updateValue">
                <input class="m-2" type="radio" id="2" :name="question_id" value="2" @click="newValue.value = 2" @change="updateValue">
                <input class="m-2" type="radio" id="3" :name="question_id" value="3" @click="newValue.value = 3" @change="updateValue">
                <input class="m-2" type="radio" id="4" :name="question_id" value="4" @click="newValue.value = 4" @change="updateValue">
                <input class="m-2" type="radio" id="5" :name="question_id" value="5" @click="newValue.value = 5" @change="updateValue">
                    <label class="my-2 text-center">5<br>a lot</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Question",
    props:[
        'content',
        'question_id'
    ],
    data: function () {
        return {
           newValue:{
               'question_id':this.question_id,
               'value':0
           }
        }
    },
    methods:{
        updateValue(){
            this.$emit('answered', this.newValue)
        }
    }

}
</script>

<style scoped>

</style>
