$(document).ready(function()
{
	if (!$("#IncludeNumber").is(":checked"))
	{
		$("#NumNumbersRow").hide();
	}

	if (!$("#IncludeSpecial").is(":checked"))
	{
		$("#NumSpecialRow").hide();
	}

	$("#IncludeNumber").change(function()
	{
		if ($(this).is(":checked"))
		{
			if ($("#NumNumbers").val() == 0)
			{
				$("#NumNumbers").val("1");
			}

			$("#NumNumbersRow").show();
		}
		else
		{
			$("#NumNumbersRow").hide();
		}
	});

	$("#IncludeSpecial").change(function()
	{
		if ($(this).is(":checked"))
		{
			if ($("#NumSpecial").val() == 0)
			{
				$("#NumSpecial").val("1");
			}

			$("#NumSpecialRow").show();
		}
		else
		{
			$("#NumSpecialRow").hide();
		}
	});
})