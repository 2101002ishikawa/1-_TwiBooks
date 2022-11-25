new Vue({
    el:'#app',
    data(){
        return{
            isGood:false,
            isBad:false,
            good:100,
            bad:10
        };
    },
    methods:{
        goodButton(){
            if(this.isBad){
                this.isBad=!this.isBad;
                this.bad--;
            }
            this.isGood=!this.isGood;
            if(this.isGood){
                return this.good++;
            }else{
                return this.good--;
            }
        },

        badButton(){
            if(this.isGood){
                this.isGood=!this.isGood;
                this.good--;
            }
            this.isBad=!this.isBad;
            if(this.isBad){
                return this.bad++;
            }else{
                return this.bad--;
            }
        }
    }
});


