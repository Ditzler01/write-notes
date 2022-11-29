var content = document.getElementById('content-pane');
var sidebar = document.getElementById('sidebar');
var navbar = document.getElementById('navbar');
var wrapper = document.getElementById('wrapper');

var isVisibleSidebar = true;
var sidebarSize = sidebar.getBoundingClientRect().width;
var viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
var navbarHeight = navbar.getBoundingClientRect().height;

//Set wrapper paddin between navbar
wrapper.style['paddingTop'] = navbarHeight + 'px';

//Automatically hide sidebar if width is small
if (viewportWidth <= 900)
{
    sidebar.style['transform'] = 'translateX(-' + sidebarSize + 'px)';
    sidebar.style['width'] = '0px';
    isVisibleSidebar = false;
}

if (!isVisibleSidebar)
{
    sidebar.style['transform'] = 'translateX(-' + (sidebarSize + 200) + 'px)';
}

function toggleSidebar()
{
    viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    
    if (isVisibleSidebar)
    {
        sidebar.style['transform'] = 'translateX(-' + (sidebarSize + 200) + 'px)';
        sidebar.style['width'] = '0px';
        sidebar.classList.remove('col');
        isVisibleSidebar = false;

        if (viewportWidth <= 900)
            content.classList.remove('d-none');
    }
    else
    {
        sidebar.style['transform'] = 'translateX(0)';
        sidebar.style['width'] = '';
        sidebar.classList.add('col');
        isVisibleSidebar = true;

        if (viewportWidth <= 900)
            content.classList.add('d-none');
    }
    
}

window.onresize = () => 
{ 
    viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    sidebarSize = sidebar.getBoundingClientRect().width;
    
    if (viewportWidth <= 900 && isVisibleSidebar)
        content.classList.add('d-none');
    else
        content.classList.remove('d-none');

    if (!isVisibleSidebar)
        sidebar.style['transform'] = 'translateX(-' + (sidebarSize + 200) + 'px)';
};

//EVENT LISTENERS
document.getElementById('hamburger').addEventListener('click', toggleSidebar);