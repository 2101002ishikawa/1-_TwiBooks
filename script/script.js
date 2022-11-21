new Vue({
    el: '#app',
    data(){
        return{
            good:0,
            bad:0,
            goodActive: false,
            badActive: false
            };
        },
    methods:{
        goodtogle(){
            this.goodActive = !this.goodActive;
            if(this.goodActive){
                return this.good++;
            }else{
                return this.good--;
            }
        },
        badtogle(){
            this.badActive = !this.badActive;
            if(this.badActive){
                return this.bad++;
            }else{
                return this.bad--;
            }
        }
    }
});