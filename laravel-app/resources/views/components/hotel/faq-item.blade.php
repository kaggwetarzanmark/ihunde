@props(['faq'])

<details>
    <summary>{{ $faq['question'] }}</summary>
    <p>{{ $faq['answer'] }}</p>
</details>
