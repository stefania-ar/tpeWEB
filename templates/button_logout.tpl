<div id="mainForms">
  
    <div id="logoutBTN">
    <form action="logout" method="get">
        {if {$user} eq true}
            <button type="submit">{$l}</button>
        {else}
        <button type="submit">{$li}</button>
        {/if}
    </form>
    </div>
    