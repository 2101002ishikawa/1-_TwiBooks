new Vue({
    el:".logincard",
    data(){
        return{
            error:"入力に誤りがあります。もう一度お確かめください。",
            NickName:"",
            FamilyName:"",
            FirstName:"",
            mail:"",
            pass:"",
        };
    },
    method:{
        onSubmit(event){
            const tel = this.NickName.length>0&&this.FamilyName.length>0&&this.FirstName.length>0&&this.pass.length>0;
            const regex = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
            const mailcheck = !regex.test(this.email);
            const answer = tel&&mailcheck;
            if(answer){
                const a = confilm("処理成功");
            }else{
                window.alert("失敗");
            }
        }
    },
    computed:{
        
    }
});