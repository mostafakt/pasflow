<style>
    pre {
        font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
        margin-bottom: 10px;
        overflow: auto;
        width: auto;
        padding: 5px;
        background-color: #eee;
        max-height: 600px;
    }
</style>

<p>
    Generate any data
</p>
<pre><code>$data = User::factory(15)->make()->toArray();</code></pre>

<pre><code>{{json_encode($data, JSON_PRETTY_PRINT)}}</code></pre>

<p>Create a collection contains my data</p>
<pre><code>$collection = collect($data);</code></pre>

<p>Get FullName and Address in format `fullname` is living in `address`</p>
<pre><code>$query1 = $collection->map(function ($user) {
    return "{$user['first_name']} {$user['last_name']} is living in {$user['address']}";
});
</code></pre>
<pre><code>{{json_encode($query1, JSON_PRETTY_PRINT)}}</code></pre>

<p>Get the user's name with the longest FullName</p>
<pre><code>$query2 = $collection->sortByDesc(function ($user) {
    return strlen($user['first_name'] . " " . $user['last_name']);
})->first();
</code></pre>
<pre><code>{{json_encode($query2, JSON_PRETTY_PRINT)}}</code></pre>

<p>Group all the users grouped by date of birthday</p>
<pre><code>$query3 = $collection->groupBy(function ($user) {
    return date('Y', strtotime($user['date_of_birthday']));
});
</code></pre>
<pre><code>{{json_encode($query3, JSON_PRETTY_PRINT)}}</code></pre>

<p>Merge the collection with the given items or with another collection</p>
<pre><code>$collection1 = collect([1, 2, 3]);
$collection2 = collect([11, 22, 33]);

$query4 = $collection1->merge($collection2);
</code></pre>
<pre><code>{{json_encode($query4, JSON_PRETTY_PRINT)}}</code></pre>

<p>Get only unique items from the collection array.</p>
<pre><code>$$collection3 = collect([1, 2, 1, 4, 4, 5, 6, 7, 8, 2, 22, 1, 2, 5]);
$query5 = $collection3->unique();
</code></pre>
<pre><code>{{json_encode($query5, JSON_PRETTY_PRINT)}}</code></pre>

<p>Get some items randomly from the collection.</p>
<pre><code> $random_users = $collection->random(3);
$q = "a";
$query6 = $collection->map(function ($user) {
    return array_merge($user, ['full_name' => $user['first_name'] . " " . $user['last_name']]);
})->filter(function ($user) use ($q) {
    return stripos($user['full_name'], $q) !== false;
})->whereNotIn('email', $random_users->pluck('email'));
</code></pre>
<p>Random Users</p>
<pre><code>{{json_encode($random_users, JSON_PRETTY_PRINT)}}</code></pre>
<p>Results</p>
<pre><code>{{json_encode($query6, JSON_PRETTY_PRINT)}}</code></pre>
