function convertDateEsToEn(dateEs,formatReturn) {
    var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
    if(dateEs.search(patron)==0) {
        values=dateEs.split("/");
        if(formatReturn==2) {
            return new Date(values[2],(parseInt(values[1])-1),values[0]);
        }else{
            return values[2]+"/"+values[1]+"/"+values[0];
        }
    }
    return "";
}