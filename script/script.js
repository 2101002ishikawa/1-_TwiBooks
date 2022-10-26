new Vue({
    el:".logincard",
    data(){
        return{
            mail: '',
            pass: '',
        };
    },
    computed:{
        isInValidPass(){
            const pass = this.pass;
            const isErr = pass.length < 8 || isNaN(Number(pass));
            return isErr;
        },
        isInValidEmail() {
            const regex = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i)
            return !regex.test(this.email);
        },
    }
});