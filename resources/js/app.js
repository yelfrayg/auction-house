const countdownElements = document.querySelectorAll('[data-end-time]');

const updateCountdowns = () => {
	const currentTime = Date.now();

	countdownElements.forEach((countdownElement) => {
		const endTime = new Date(countdownElement.dataset.endTime).getTime();
		const remainingSeconds = Math.max(0, Math.floor((endTime - currentTime) / 1000));

		if (remainingSeconds === 0) {
			countdownElement.textContent = 'Auction Ended';
			return;
		}

		const days = Math.floor(remainingSeconds / 86400);
		const hours = Math.floor((remainingSeconds % 86400) / 3600);
		const minutes = Math.floor((remainingSeconds % 3600) / 60);
		const seconds = remainingSeconds % 60;
		const timeParts = [];

		if (days > 0) {
			timeParts.push(`${days}d`);
		}

		if (hours > 0 || days > 0) {
			timeParts.push(`${hours}h`);
		}

		timeParts.push(`${minutes}m`);
		timeParts.push(`${seconds}s`);
		countdownElement.textContent = timeParts.join(' ');
	});
};

updateCountdowns();
setInterval(updateCountdowns, 1000);
