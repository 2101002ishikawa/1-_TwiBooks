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


//ナビゲーションバーの検索ボタンのJS 開閉ボタンを押した時には
$(".open-btn1").click(function () {
    $(this).toggleClass('btnactive');//.open-btnは、クリックごとにbtnactiveクラスを付与＆除去。1回目のクリック時は付与
    $("#search-wrap").toggleClass('panelactive');//#search-wrapへpanelactiveクラスを付与
    $('#search-text').focus();//テキスト入力のinputにフォーカス
});