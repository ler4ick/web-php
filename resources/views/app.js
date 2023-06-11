const PhotoAlbum = {
  data() {
    const photos_array = [
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
      '1.JPG',
    ]

    const titles_array = [
      'MEME #1',
      'MEME #2',
      'MEME #3',
      'MEME #4',
      'MEME #5',
      'MEME #6',
      'MEME #7',
      'MEME #8',
      'MEME #9',
      'MEME #10',
      'MEME #11',
      'MEME #12',
      'MEME #13',
      'MEME #14',
      'MEME #15',
    ]

    return {
      index: -1,
      photos: [
        {
          title: titles_array[0],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[0],
          alt: 'Альтернативный текст',
          comment: 'Я так привыкла жить одним тобой',
        },
        {
          title: titles_array[1],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[1],
          alt: 'Альтернативный текст',
          comment: 'Одним тобой',
        },
        {
          title: titles_array[2],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[2],
          alt: 'Альтернативный текст',
          comment: 'Встречать рассвет и слышать, как проснешься не со мной',
        },
        {
          title: titles_array[3],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[3],
          alt: 'Альтернативный текст',
          comment: 'Мне стало так легко дышать в открытое окно',
        },
        {
          title: titles_array[4],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[4],
          alt: 'Альтернативный текст',
          comment: 'И повторять ей лишь одно:',
        },
        {
          title: titles_array[5],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[5],
          alt: 'Альтернативный текст',
          comment: 'Знаешь ли ты, вдоль ночных дорог шла босиком,',
        },
        {
          title: titles_array[6],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[6],
          alt: 'Альтернативный текст',
          comment: 'не жалея ног?',
        },
        {
          title: titles_array[7],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[7],
          alt: 'Альтернативный текст',
          comment: 'Сердце его теперь в твоих руках.',
        },
        {
          title: titles_array[8],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[8],
          alt: 'Альтернативный текст',
          comment: 'Не потеряй его и не сломай,',
        },
        {
          title: titles_array[9],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[9],
          alt: 'Альтернативный текст',
          comment: 'Чтоб не нести вдоль ночных дорог пепел любви в руках,',
        },
        {
          title: titles_array[10],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[10],
          alt: 'Альтернативный текст',
          comment: 'сбив ноги в кровь',
        },
        {
          title: titles_array[11],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[11],
          alt: 'Альтернативный текст',
          comment: 'Пульс его теперь в твоих глазах,',
        },
        {
          title: titles_array[12],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[12],
          alt: 'Альтернативный текст',
          comment: 'Не потеряй его',
        },
        {
          title: titles_array[13],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[13],
          alt: 'Альтернативный текст',
          comment: 'И не сломай',
        },
        {
          title: titles_array[14],
          photo: 'http://127.0.0.1:8030/photos/' + photos_array[14],
          alt: 'Альтернативный текст',
          comment: 'И не сломай',
        },
      ],
    }
  },
}

const app = Vue.createApp(PhotoAlbum)

app.component('album-item', {
  props: ['package'],
  emits: ['click'],
  template: `
            <div class="album-item" @click="$emit('click')">
                <img :src="package.photo" :alt="package.alt">
            </div>
        `,
  data() {
    return {
      isOpened: false,
    }
  },
})

app.component('img-popup', {
  props: ['photos', 'index'],
  emits: ['close'],
  template: `
            <teleport to="body">
            <div class="img_popup" @click.self="$emit('close')">
                <button type="button" class="to_left" @click="previous">&#8249;</button>
                <div class="content">
                    <img :src="photos[id].photo" :alt="photos.alt">
                    <div class="text">
                        <h2>{{photos[id].title}}</h2>
                        <p>{{photos[id].comment}}</p>
                    </div>
                </div>
                <button type="button" class="to_right" @click="next">&#8250;</button>
            </div>
        </teleport>
        `,
  data() {
    return {
      id: this.$props.index,
    }
  },
  methods: {
    previous: function () {
      if (!this.id) {
        this.id = this.$props.photos.length - 1
      } else {
        this.id--
      }
    },
    next: function () {
      if (this.id === this.$props.photos.length - 1) {
        this.id = 0
      } else {
        this.id++
      }
    },
  },
})

app.mount('#app')
