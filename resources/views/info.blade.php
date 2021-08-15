<x-layout>
    <div class="row">
        <div class="offset-sm-2 col-sm-8">
            <h1>Info</h1>
            <dl class="row">
                <dt class="col-sm-2">Short link:</dt>
                <dd class="col-sm-9">
                    {{ url($link->link_id) }}
                </dd>
                <dt class="col-sm-2">Create:</dt>
                <dd class="col-sm-9">{{ $link->created_at }}</dd>
                <dt class="col-sm-2">Full link:</dt>
                <dd class="col-sm-9">{{ $link->full_url }}</dd>
                <dt class="col-sm-2">Clicks:</dt>
                <dd class="col-sm-9">{{ $link->clicks->count() }}</dd>
            </dl>
        </div>
    </div>
    
</x-layout>
