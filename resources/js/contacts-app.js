const app = Vue.createApp();

app.component("form-item", {
    data: () => ({
        showValidateState: false,
        isSaveCompete: false,
        formData: {
            name: "",
            surname: "",
            age: null,
            sex: "",
            frameworks: [],
        },

        sexOptions: Object.freeze({
            M: "M",
            F: "F",
        }),
        frameWorksOptions: Object.freeze({
            VUE: "Vue",
            ANGULAR: "ANGULAR",
            SVELTE: "SVELTE",
            REACT: "REACT",
        }),
    }),
    //описание форм
    template: `
  <form @submit.prevent="validateForm" @reset="handleReset">
    <div>
        <input class="field" type="text" v-model="formData.name" placeholder="Имя"/>
    </div>
    <div>
        <input class="field" type="text" v-model="formData.surname" placeholder="Фамилия"/>
    </div>
    <div>
        <input class="field" type="number" v-model="formData.age" placeholder="Возраст"/>
    </div>
    <div>
        <div v-for="option in sexOptions" :key="option">
            <input class="field" v-model="formData.sex" :value="option" type="radio" :id="option">
            <label class="form-check-label" :for="option">
                {{ option }}
            </label>
        </div>
    </div>
    <div class="wrapper">
                  <div v-for="option in frameWorksOptions" :key="option">
                    <input v-model="formData.frameworks" :value="option" type="checkbox" :id="option">
                    <label class="form-check-label" :for="option">
                      {{ option }}
                    </label>
                  </div>
                </div>
    <div v-if="showValidateState && errors.length > 0">
                  <div class="alert-danger">
                    <h4>Ошибка валидации</h4>
                    <p id="errorFio" v-for="error in errors" :key="error.message">{{ error.message }}</p>
                  </div>
    </div>
                <div v-if="isSaveCompete">
                  <div class="alert-success">
                    <h4>Сохранение</h4>
                    <p id="errorFio">Данные успешно сохранены</p>
                  </div>
                </div>
                <div>
                    <input class="button" type="submit" id="submit" value="Отправить">
                    <input class="button" type="reset" value="Очистить форму" id="resett">
                </div>
  </form>
  `,
    //список ошибок
    computed: {
        errors() {
            const errors = [];
            if (!this.formData.name) {
                errors.push({ field: "name", message: "Введите имя!" });
            } else {
                errors.filter((error) => error.field !== "name");
            }
            if (!this.formData.surname) {
                errors.push({ field: "surname", message: "Введите Фамилию!" });
            } else {
                errors.filter((error) => error.field !== "surname");
            }
            if (!this.formData.age && typeof this.formData.age !== "number") {
                errors.push({ field: "age", message: "Укажите возраст!" });
            } else {
                errors.filter((error) => error.field !== "age");
            }
            if (!this.formData.sex) {
                errors.push({ field: "sex", message: "Укажите пол!" });
            } else {
                errors.filter((error) => error.field !== "sex");
            }
            return errors;
        },
    },
    //если ошибки есть, то вывод их, иначе всё ок
    methods: {
        validateForm() {
            this.$data.showValidateState = true;
            if (this.errors.length === 0) {
                this.$data.isSaveCompete = true;
            }
        },

        handleReset() {
            this.$data.showValidateState = false;
            this.$data.isSaveCompete = false;
            this.$data.formData = {
                name: "",
                surname: "",
                age: {},
                sex: "",
                frameworks: [],
            };
        },
    },
});

app.mount("#app");
