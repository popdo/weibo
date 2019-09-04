<form action="{{ route('statuses.store') }}" method="post">
    @csrf
    @include('shared._errors')
    <div class="field">
        <textarea class="form-item" placeholder="聊聊新鲜事儿..." name="content">{{ old('content') }}</textarea>
    </div>
    <div class="field text-right">
        <button class="btn" style="width:100px">发布</button>
    </div>
</form>