function filterTickets() {
    const type = document.getElementById('filterType').value.toLowerCase();
    const from = document.getElementById('filterFrom').value.toLowerCase();
    const to = document.getElementById('filterTo').value.toLowerCase();

    const cards = document.querySelectorAll('.ticket-card');

    cards.forEach(card => {
        const cardType = card.dataset.type;
        const cardFrom = card.dataset.from;
        const cardTo = card.dataset.to;

        const matchType = type === '' || cardType === type;
        const matchFrom = from === '' || cardFrom.includes(from);
        const matchTo = to === '' || cardTo.includes(to);

        card.style.display = (matchType && matchFrom && matchTo) ? 'block' : 'none';
    });
}