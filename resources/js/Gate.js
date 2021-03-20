// Cuz, St. Peter holds the keys
export default class Gate{
    constructor(user){
        this.user=user;

    }
    isGreyManager(){
        return this.user.type === 'greyman';
    }
    isAdmin(){
        return this.user.type === 'admin';
    }
    isUser(){
        return this.user.type === 'user';
    }
}