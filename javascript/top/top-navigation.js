/**
 * This is the W3 recommendation for how to do a fly-out navigation menu.
 * Sub-menus should open on click, or spacebar if the item is focused.
 * https://www.w3.org/WAI/tutorials/menus/flyout/
 */


'use strict';
class DisclosureNav {
  constructor(domNode) {
    console.log("init top nav")
    this.rootNode = domNode;
    this.timers = [];
    this.controlledNodes = [];
    this.openIndex = null;
    this.useArrowKeys = true;
    this.desktopQuery = window.matchMedia("(min-width: 768px)")
    this.topLevelNodes = [
      ...this.rootNode.querySelectorAll(
        '.main-link, button[aria-expanded]'
        // '.main-link, button[aria-expanded][aria-controls]'
      ),
    ];

    // add a class once JS has loaded to avoid flash of unstyled content
    domNode.classList.add('loaded')

    this.topLevelNodes.forEach((node) => {
      // handle button + menu
      if (
        node.tagName.toLowerCase() === 'button' &&
        node.hasAttribute('aria-controls')
      ) {
        const menu = node.parentNode.querySelector('.sub-menu-wrap');
        if (menu) {
          var li = node.closest('li')
          // save ref controlled menu
          this.controlledNodes.push(menu);

          // collapse menus
          node.setAttribute('aria-expanded', 'false');
          this.toggleMenu(menu, false);

          // attach event listeners
          menu.addEventListener('keydown', this.onMenuKeyDown.bind(this));
          node.addEventListener('click', this.onButtonClick.bind(this));
          node.addEventListener('keydown', this.onButtonKeyDown.bind(this));
          li.addEventListener('mouseover', this.onMouseOver.bind(this));
          li.addEventListener('mouseout', this.onMouseOut.bind(this));
        }
      }
      // handle links
      else {
        this.controlledNodes.push(null);
        node.addEventListener('keydown', this.onLinkKeyDown.bind(this));
      }
    });

    this.rootNode.addEventListener('focusout', this.onBlur.bind(this));
  }

  controlFocusByKey(keyboardEvent, nodeList, currentIndex) {
    switch (keyboardEvent.key) {
      case 'ArrowUp':
      case 'ArrowLeft':
        keyboardEvent.preventDefault();
        if (currentIndex > -1) {
          var prevIndex = Math.max(0, currentIndex - 1);
          nodeList[prevIndex].focus();
        }
        break;
      case 'ArrowDown':
      case 'ArrowRight':
        keyboardEvent.preventDefault();
        if (currentIndex > -1) {
          var nextIndex = Math.min(nodeList.length - 1, currentIndex + 1);
          nodeList[nextIndex].focus();
        }
        break;
      case 'Home':
        keyboardEvent.preventDefault();
        nodeList[0].focus();
        break;
      case 'End':
        keyboardEvent.preventDefault();
        nodeList[nodeList.length - 1].focus();
        break;
    }
  }

  // public function to close open menu
  close() {
    this.toggleExpand(this.openIndex, false);
  }

  onBlur(event) {
    var menuContainsFocus = this.rootNode.contains(event.relatedTarget);
    if (!menuContainsFocus && this.openIndex !== null) {
      this.toggleExpand(this.openIndex, false);
    }
  }
  onMouseOver(event) {
    if (this.desktopQuery.matches) {
      var button = event.currentTarget.querySelector('button[aria-expanded][aria-controls]');
      var buttonIndex = this.topLevelNodes.indexOf(button);
      clearTimeout(this.timers[buttonIndex]);
      this.toggleExpand(buttonIndex, true);
    }
  }
  onMouseOut(event) {
    if (this.desktopQuery.matches) {
      var button = event.currentTarget.querySelector('button[aria-expanded][aria-controls]');
      var buttonIndex = this.topLevelNodes.indexOf(button);
      this.timers[buttonIndex] = setTimeout(this.close.bind(this), 1000);
    }
  }

  onButtonClick(event) {
    var button = event.target;
    var buttonIndex = this.topLevelNodes.indexOf(button);
    var buttonExpanded = button.getAttribute('aria-expanded') === 'true';
    this.toggleExpand(buttonIndex, !buttonExpanded);
  }

  onButtonKeyDown(event) {
    var targetButtonIndex = this.topLevelNodes.indexOf(document.activeElement);

    // close on escape
    if (event.key === 'Escape') {
      this.toggleExpand(this.openIndex, false);
    }

    // move focus into the open menu if the current menu is open
    else if (
      this.useArrowKeys &&
      this.openIndex === targetButtonIndex &&
      event.key === 'ArrowDown'
    ) {
      event.preventDefault();
      this.controlledNodes[this.openIndex].querySelector('a').focus();
    }

    // handle arrow key navigation between top-level buttons, if set
    else if (this.useArrowKeys) {
      this.controlFocusByKey(event, this.topLevelNodes, targetButtonIndex);
    }
  }

  onLinkKeyDown(event) {
    var targetLinkIndex = this.topLevelNodes.indexOf(document.activeElement);

    // handle arrow key navigation between top-level buttons, if set
    if (this.useArrowKeys) {
      this.controlFocusByKey(event, this.topLevelNodes, targetLinkIndex);
    }
  }

  onMenuKeyDown(event) {
    if (this.openIndex === null) {
      return;
    }

    var menuLinks = Array.prototype.slice.call(
      this.controlledNodes[this.openIndex].querySelectorAll('a')
    );
    var currentIndex = menuLinks.indexOf(document.activeElement);

    // close on escape
    if (event.key === 'Escape') {
      this.topLevelNodes[this.openIndex].focus();
      this.toggleExpand(this.openIndex, false);
    }

    // handle arrow key navigation within menu links, if set
    else if (this.useArrowKeys) {
      this.controlFocusByKey(event, menuLinks, currentIndex);
    }
  }

  toggleExpand(index, expanded) {
    // close open menu, if applicable
    if (this.openIndex !== index) {
      this.toggleExpand(this.openIndex, false);
    }

    // handle menu at called index
    if (this.topLevelNodes[index]) {
      this.openIndex = expanded ? index : null;
      this.topLevelNodes[index].setAttribute('aria-expanded', expanded);
      this.toggleMenu(this.controlledNodes[index], expanded);
    }
  }

  toggleMenu(domNode, show) {
    if (domNode) {
      domNode.style.display = show ? 'block' : 'none';
    }
  }

  updateKeyControls(useArrowKeys) {
    this.useArrowKeys = useArrowKeys;
  }
}

/* Initialize Disclosure Menus */

window.addEventListener('load', function () {
    var menus = document.querySelectorAll('.disclosure-nav');
    var disclosureMenus = [];

    for (var i = 0; i < menus.length; i++) {
      disclosureMenus[i] = new DisclosureNav(menus[i]);
    }

    // // listen to arrow key checkbox
    // var arrowKeySwitch = document.getElementById('arrow-behavior-switch');
    // if (arrowKeySwitch) {
    //   arrowKeySwitch.addEventListener('change', function () {
    //     var checked = arrowKeySwitch.checked;
    //     for (var i = 0; i < disclosureMenus.length; i++) {
    //       disclosureMenus[i].updateKeyControls(checked);
    //     }
    //   });
    // }

  },
  false
);





/** Nav Tabbable */
document.addEventListener("DOMContentLoaded", () => {
  // Hide the dropdown when clicking the nav button a second time.
  var focusedButtons = [];
  var navButtons = document.querySelectorAll('.open-on-focus button'); //.link-with-arrow .caratf
  navButtons.forEach(function(item) {
    item.addEventListener('focus', function(e) {
      setTimeout(() => {  // Delayed to give the click handler time to run first.
        focusedButtons.push(item)
      }, "100");
    })
    item.addEventListener('blur', function(e) {
      focusedButtons.splice(focusedButtons.indexOf(item), 1);
    })
    item.addEventListener('click', function(e) {
      if(focusedButtons.includes(item)){
        document.activeElement.blur();
      }
    }, false);
  });
});


/** Open and close mobile menu when hamburger icon is clicked */
document.addEventListener("DOMContentLoaded", () => {
  var mainMenu = document.getElementById('pageHeader').querySelector('nav');
  console.log(mainMenu)

  document.getElementById('mobile-menu-toggle').addEventListener('click', function(e) {
    console.log("Clicked Hamburger",mainMenu)
    var navWrapper = mainMenu.getElementsByClassName('nav-wrapper')[0]
    console.log("a",)
    var toggleBtn = mainMenu.querySelector('#mobile-menu-toggle')
    console.log("b",toggleBtn)

    if(navWrapper.classList.contains('open')){
      console.log("Remove Open")
      navWrapper.classList.remove('open');
      toggleBtn.ariaExpanded = "false"
    } else {
      console.log("Add Open")
      navWrapper.classList.add('open');
      toggleBtn.ariaExpanded = "true"
    }
    e.stopImmediatePropagation();
  }, false);
})




