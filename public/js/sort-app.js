function sortApp(a, v, setSort) {

    if(setSort == 'byOne') {
        for(let x of a) {
            const divId = document.getElementById(x);

            if(x == v) {
                divId.classList.remove('hidden');
                divId.classList.add('block');
                continue;
            }
            divId.classList.add('hidden');
            divId.classList.remove('block');
            divId.classList.remove('flex');
        }
    } else {
        for(let x of a) {
            const divId = document.getElementById(x);

            if(x == 'Other') {
                divId.classList.add('flex');
                divId.classList.remove('hidden');
                continue;
            }
            divId.classList.add('block');
            divId.classList.remove('hidden');
        }
    }
}