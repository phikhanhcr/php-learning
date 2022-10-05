<div>
  <div>Create a user</div>
        <form action="{{ route('home.postAdd') }}" method="POST">
            @csrf
            <input type="text" name="name">
            <input type="email" name="email" id="">
            <input type="password" type="password" name="password">
            <button class="btn btn-info">Add</button>
        </form>
</div>