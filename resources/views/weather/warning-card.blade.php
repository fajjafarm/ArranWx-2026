<tr>
    <td>{{ $warning['type'] }}</td>
    <td>{{ $warning['description'] }}</td>
    <td>
        <span class="badge {{ $warning['severity'] == 'Amber' ? 'bg-warning' : ($warning['severity'] == 'Yellow' ? 'bg-info' : ($warning['severity'] == 'Severe' ? 'bg-danger' : 'bg-secondary')) }} rounded-pill">
            {{ $warning['severity'] }}
        </span>
    </td>
    <td>{{ $warning['time'] }}</td>
</tr>

<!-- Reusable Card for Other Pages -->
<div class="card d-none weather-warning-card">
    <div class="card-body">
        <h5 class="card-title">{{ $warning['type'] }} Warning</h5>
        <p class="card-text">{{ $warning['description'] }}</p>
        <p class="card-text"><small class="text-muted">Severity: <span class="badge {{ $warning['severity'] == 'Amber' ? 'bg-warning' : ($warning['severity'] == 'Yellow' ? 'bg-info' : ($warning['severity'] == 'Severe' ? 'bg-danger' : 'bg-secondary')) }} rounded-pill">{{ $warning['severity'] }}</span></small></p>
        <p class="card-text"><small class="text-muted">Issued: {{ $warning['time'] }}</small></p>
    </div>
</div>