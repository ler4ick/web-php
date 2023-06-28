<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/js/app.js'])
    <title>Мой блог</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

@include('layouts/header')


<div class="HeaderTest" align=center>
    <h2>Блог</h2>
</div>

@php
use \Illuminate\Support\Facades\Auth;

$user = Auth::user();
$isUserAdmin = (Auth::check() and $user->isAdmin());
$isUserRedactor = (Auth::check() and $user->isRedactor());
@endphp

<style>
    .modal[data-open="false"] {
        display: none;
    }
    .modal[data-open="true"] {
        display: flex;
        flex-direction: column;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    .modal__body {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1 1 100%;
    }
    .modal__body {
    }
    .modal__form-content {
        position: relative;
        background-color: white;
        padding: 50px 30px;
        border-radius: 5px;
    }
    .modal__form {
        display: flex;
        flex-direction: column;
    }
    .modal__cross {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        right: 5px;
        top: 5px;
        height: 25px;
        width: 25px;
    }
    .modal__cross:before {
        position: absolute;
        content: "";
        display: block;
        background-color: black;
        height: 2px;
        width: 100%;
    }
    .modal__cross:after {
        position: absolute;
        content: "";
        display: block;
        background-color: black;
        height: 2px;
        width: 100%;
    }
    .modal__cross:before {
        transform: rotate(45deg);
    }
    .modal__cross:after {
        transform: rotate(-45deg);
    }
</style>

<script>
    const renderModal = ({ renderTo, id, onClose, onSubmit, formBody }) => {
        const modalRoot = document.createElement('div')

        const renderModalBody = (content) => {
            modalRoot.getElementsByClassName('modal__form')[0].innerHTML = content
        }


        const openModal = (_formBody) => {
            modalRoot.dataset.open = 'true'
            renderModalBody(_formBody ? _formBody : formBody)
        }

        const closeModal = () => {
            modalRoot.dataset.open = 'false'

            if (onClose) {
                onClose()
            }
        }


        const handleClose = (e, forceClose = false) => {
            if (!modalRoot.getElementsByClassName('modal__form_wrapper')[0].contains(e.target) || forceClose) {
                closeModal();
            }
        }

        const handleSubmit = (e) => {
            e.preventDefault();

            if (onSubmit) {
                const fd = new FormData(e.target)

                onSubmit(fd)
            }
        }

        modalRoot.id = id
        modalRoot.classList.add('modal')

        modalRoot.innerHTML = `
                <div class="modal__body">
                    <div class="modal__form_wrapper">
                                  <div class="modal__form-content">
                                    <span class="modal__cross"></span>
                                    <form class="modal__form">
                                    </form>
                                  </div>
                        </div>
                </div>
        `

        renderTo.append(modalRoot);

        modalRoot.getElementsByClassName('modal__form')[0].addEventListener('submit', handleSubmit)
        modalRoot.getElementsByClassName('modal__cross')[0].addEventListener('click', e => handleClose(e, true))
        modalRoot.children[0].addEventListener('click', handleClose)

        closeModal()

        return {
            open: openModal,
            close: closeModal,
            el: modalRoot
        }
    }


    @if(!!$user)
    let activePost = null
    const userId = '{{$user->id}}'

    const {open: addCommentModalOpen, el: addCommentModalElement, close: addCommentModalClose} = renderModal({
        renderTo: document.body,
        onSubmit: (fd) => {
            fd.set('post_id', activePost)
            fd.set('user_id', userId)

            fetch('{{route('api.comment.store')}}', {
                method: 'post',
                body: fd
            }).then(res => res.json())
                .then(res => {
                    const comments = res.data
                    const commentTable = document.querySelector(`.comment-table[data-blog-id="${activePost}"]`)

                    addCommentModalElement.getElementsByTagName('form')[0].reset()

                    const tableBody = commentTable.getElementsByTagName('tbody')[0]

                    tableBody.innerHTML = comments.map(comment => `
                        <tr>
                            <td style="text-align: left">
                               ${comment.user.name} (${comment.created_at}): ${comment.text}
                            </td>
                        </tr>`).join('')

                    addCommentModalClose();
                })
        },
        onClose: () => {
            activePost = null
        },
        formBody: `
            <label for="comment">Комментарий</label>
             <textarea id="comment" name="text"></textarea>
            <button style="margin-top: 20px">
               Отправить
            </button>
        `
    })
    function handleAddCommentModalOpen(e) {
        activePost = Number(e.target.dataset.postId)
        addCommentModalOpen()
    }
    @endif

    @if($isUserAdmin)
    const {open: blogRecordRedactorModalOpen, close: blogRecordRedactorModalClose} = renderModal({
        renderTo: document.body,
        id: 'blog-add-comment-modal',
        onSubmit: (fd) => {
            fd.set('post_id', activePost)
            fd.set('user_id', userId)

            fetch('{{route('api.blog.update')}}', {
                method: 'post',
                body: fd
            }).then(res => res.json())
                .then(res => {
                    const record = res.data
                    const table = document.getElementsByClassName('posts-table')[0]
                    const tr = table.querySelector(`tr[data-record-id='${activePost}']`)

                    tr.getElementsByClassName(`post__title`)[0].innerText = record.title
                    tr.getElementsByClassName(`post__message`)[0].innerText = record.message

                    const imageContainer = tr.getElementsByClassName(`post__image`)[0]

                    if (record.image) {
                        if (imageContainer.children[0]) {
                            imageContainer.children[0].src = record.image
                        } else {
                            imageContainer.innerHTML = `
                        <img src="${record.image}" style="max-width: 40%;"/>
                        `
                        }
                    } else {
                        imageContainer.innerHTML = ''
                    }

                    blogRecordRedactorModalClose();
                })
        },
        onClose: () => {
            activePost = null
        }
    })
    function handleBlogRedactorModalOpen(e) {
        activePost = Number(e.target.dataset.postId)

        const table = document.getElementsByClassName('posts-table')[0]
        const tr = table.querySelector(`tr[data-record-id='${activePost}']`)

        const titleValue = tr.getElementsByClassName(`post__title`)[0].innerText
        const messageValue = tr.getElementsByClassName(`post__message`)[0].innerText
        const imagesSrc = tr.getElementsByClassName(`post__image`)[0].children[0]?.src

        blogRecordRedactorModalOpen(`
                <label for="title">Тема сообщения:</label>
                    <p><input type="text" name="title" id="title" value="${titleValue}"></p>

                <label for="image">Изображение:</label>
                    <div style="margin-top: 10px">
                        <img src="${imagesSrc}" style="object-fit: cover; object-position: center" alt="" width="200" height="200">
                    </div>
                    <p>
<input type="file" name="image" id="image">
${!imagesSrc ? '' : `<label>
            Удалить изображение
            <input type="checkbox" name="remove_image" value="1" />
        </label>`}
</p>
                <label for="content">Текст сообщения:</label>
                    <p>
                        <textarea name="message" id="message" rows="5">${messageValue}</textarea>
                    </p>
                    <p><input type="submit" value="Отправить"></p>
                </div>
            <button style="margin-top: 20px">
               Отправить
            </button>
        `)
    }
    @endif
</script>

<form id="form" class="blog-form" enctype="multipart/form-data" method="post" action="{{ route('blog.store') }}">
    @csrf
    <div class="blogInputForm">
        <label for="title">Тема сообщения:</label>
        <p><input type="text" name="title" id="title"></p>
        @if($errors->has('title'))
            <p style="color: red">{{$errors->first('title')}}</p>
        @endif

        <label for="image">Изображение:</label>
        <p> <input type="file" name="image" id="image"></p>
        @if($errors->has('image'))
            <p style="color: red">{{$errors->first('image')}}</p>
        @endif

        <label for="content">Текст сообщения:</label>
        <p><textarea name="message" id="message" rows="5"></textarea></p>
        @if($errors->has('message'))
            <p style="color: red">{{$errors->first('message')}}</p>
        @endif
        <p><input type="submit" value="Отправить"></p>
    </div>
</form>

<div class="blog-form">
    <table>
        <thead>
        <tr>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Сообщение</th>
            <th>Изображение</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="posts-table">
        @foreach($blogPosts as $posts)
            <tr data-record-id="{{$posts->id}}">
                <td class="post__created-at">{{ $posts->created_at->format('d.m.Y H:i') }}</td>
                <td class="post__title">{{ $posts->title }}</td>
                <td class="post__message">{{ $posts->message }}</td>
                <td class="post__image">
                    @if ($posts->image)
                        <img src="{{ Storage::url('blog_images/' . $posts->image) }}" alt="{{ $posts->title }}" style="width: 125px; height: 150px;">
                    @endif
                </td>
                <td>
                    @if($isUserAdmin)
                        <form method="POST" action="{{ route('blog.delete', ['id' => $posts->id]) }}">
                            @method('delete')
                            @csrf
                            <button>Удалить</button>
                        </form>
                        <button onclick="handleBlogRedactorModalOpen(event)" data-post-id="{{$posts->id}}">Редактировать</button>
                    @endif
                    @if(!!$user)
                        <button onclick="handleAddCommentModalOpen(event)" data-post-id="{{$posts->id}}">Добавить комментарий</button>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="comment-table" data-blog-id="{{$posts->id}}">
                        <thead>
                        <tr>
                            <th>
                                Комментарии
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts->comments()->orderBy('created_at', 'desc')->with('user')->get() as $comment)
                            <tr>
                                <td style="text-align: left">
                                    {{$comment->user->name}} ({{$comment->created_at->format('d.m.Y H:i')}}): {{$comment->text}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $blogPosts->links() }}
</div>
</body>
</html>
