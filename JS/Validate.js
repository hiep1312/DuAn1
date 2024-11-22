class Validate{
    #messageNotificationDefault = {
        email: ["Email không hợp lệ!", "Email hợp lệ!"],
        phone: ["SĐT không hợp lệ", "SĐT hợp lệ"],
        textLimit: ["Không đạt đủ số lượng chữ", "Đạt đủ số lượng chữ"],
        image: ["Ảnh không hợp lệ", "Ảnh hợp lệ"]
    }
    #typeAndValidations = {
        email: /^[^@.]+@[a-zA-Z]{3,9}\.([a-zA-Z]{2,7}|[a-zA-Z]{2,7}\.[a-zA-Z]{2,7})$/,
        phone: /^(0|\+84|84)\d{9}$/,
        textLimit: "Code hidden",
        image: "Code hidden"
    }
    constructor(validate = false, type = false, message = [], options = null) {
        if(typeof validate === "object" && !type) this.checkFormAndDisplay(validate);
        else if(validate && type) this.checkAndDisplay(validate, type, message, options);
    }
    checkFormAndDisplay(inputs = {}, throwErrorValue = true){
        if(typeof inputs !== "object"){
            throw new Error("Invalid inputs!");
        }else{
            Object.entries(inputs).forEach((input, location) => {
                if(typeof input[1] !== "object"){
                    throw new Error("Invalid value of inputs!");
                }else{
                    if(!input[1].type){
                        if(throwErrorValue) throw new Error(`Type not found in inputs ${location}!`);
                        else console.error(`Type not found in inputs! index ${location}!`);
                    }else{
                        this.checkAndDisplay(input[0], input[1].type, input[1].message || [], input[1].options);
                    }
                }
            });
        }
    }
    checkAndDisplay(selector, type, message = [], options = null){
        try{
            let input;
            if(selector instanceof Element){
                input = selector;
            }else if(selector instanceof NodeList || selector instanceof HTMLCollection){
                input = selector.item(0);
            }else{
                input = document.querySelector(selector);
            }
            const formInput = input.closest("form");
            formInput.setAttribute("novalidate", "");
            if(type==="textLimit" && typeof options === "number"){
                Object.defineProperty(this.#typeAndValidations,"textLimit", {
                    configurable: false,
                    enumerable: true,
                    value: new RegExp(`\\w{${options.toFixed(0)},}`, "u"),
                    writable: true
                })
            }else if(!Object.keys(this.#typeAndValidations).some(value => value===type)){
                throw new Error("Invalid type!");
            }
            if(!Array.isArray(message) && typeof message === "string") message = [message];
            else if(!Array.isArray(message) && typeof message !== "string") throw new Error("Invalid message!");
            formInput.addEventListener("submit", e => {
                e.preventDefault();
                const inputData = input.value;
                const feedback = (input, type, message = '', status = 0) => {
                    const checkFeedbackOld = input.nextElementSibling;
                    if(checkFeedbackOld && (checkFeedbackOld.classList.contains("invalid-feedback") || checkFeedbackOld.classList.contains("valid-feedback"))){
                        if(checkFeedbackOld.classList.contains(status===0?"valid-feedback":"invalid-feedback")) checkFeedbackOld.classList.remove(status===0?"valid-feedback":"invalid-feedback");
                        checkFeedbackOld.classList.toggle(status===0?"invalid-feedback":"valid-feedback", true);
                        checkFeedbackOld.textContent = !message?this.#messageNotificationDefault[type][status]:message;
                    }else{
                        const feedbackElement = document.createElement('div');
                        feedbackElement.setAttribute("class", status===0?"invalid-feedback":"valid-feedback");
                        feedbackElement.textContent = !message?this.#messageNotificationDefault[type][status]:message;
                        feedbackElement.style.display = "block !important";
                        input.after(feedbackElement);
                    }
                }
                if(type==="image"){
                    let inputFile = input.files ?? false;
                    if(inputFile.length > 0 && inputFile){
                        inputFile = Array.from(inputFile);
                        let checkImage = true;
                        for(let file of inputFile){
                            if(!file.type.includes("image/")){
                                checkImage = false;
                                break;
                            }
                        }
                        if(checkImage){
                            input.classList.toggle("is-valid", true);
                            input.classList.toggle("is-invalid", false);
                            feedback(input, type, message[1] ?? false, 1);
                        }else{
                            input.classList.toggle("is-invalid", true);
                            input.classList.toggle("is-valid", false);
                            feedback(input, type, message[0] ?? false, 0);
                        }
                    }
                }else if(this.#typeAndValidations[type].test(inputData)){
                    input.classList.toggle("is-valid", true);
                    input.classList.toggle("is-invalid", false);
                    feedback(input, type, message[1] ?? false, 1);
                }else{
                    input.classList.toggle("is-invalid", true);
                    input.classList.toggle("is-valid", false);
                    feedback(input, type, message[0] ?? false, 0);
                }
            }, false);
        }catch(error){
            console.error(error);
        }
    }
    checkForm(inputs = {}, checkAll = true){
        if(typeof inputs !== "object" || typeof checkAll !== "boolean"){
            return undefined;
        }else{
            let checkOld = null;
            Object.entries(inputs).forEach((input, location) => {
                if(typeof input[1] !== "object"){
                    return undefined;
                }else{
                    if(!input[1].type){
                        console.error(`Type not found in inputs! index ${location}!`);
                    }else{
                        checkOld = this.check(input[0], input[1].type, input[1].options) ?? false;
                        if(checkAll || !checkOld){
                            return false;
                        }else if(!checkAll || checkOld){
                            return true;
                        }
                    }
                }
            });
            return checkAll;
        }
    }
    check(data, type, options = null){
        if(type==="textLimit" && typeof options === "number"){
            Object.defineProperty(this.#typeAndValidations,"textLimit", {
                configurable: false,
                enumerable: true,
                value: new RegExp(`\\w{${options.toFixed(0)},}`, "u"),
                writable: true
            });
        }else if(!Object.keys(this.#typeAndValidations).some(value => value===type)){
            return undefined;
        }
        if(type==="image"){
            let data = data.files ?? false;
            if(data && data.length > 0){
                data = Array.from(data);
                let checkImage = true;
                for(let file of data){
                    if(!file.type.includes("image/")){
                        checkImage = false;
                        break;
                    }
                }
                return checkImage;
            }
        }
        return this.#typeAndValidations[type].test(data);
    }
    setMessageDefault(type, message){
        if(!Object.keys(this.#messageNotificationDefault).some(value => value===type) || !Array.isArray(message) || (message.length<2 && Array.isArray(message))) return false;
        this.#messageNotificationDefault[type] = [message[0] ?? "Không hợp lệ", message[1] ?? "Hợp lệ"];
        return true;
    }
    getMessageDefault(type){
        if(!Object.keys(this.#messageNotificationDefault).some(value => value===type)) return false;
        return this.#messageNotificationDefault[type];
    }
    getAllMessageDefault(){
        return this.#messageNotificationDefault;
    }
}