# bot.py
import os

import discord
from discord.ext import commands
from dotenv import load_dotenv

load_dotenv()
TOKEN = os.getenv('DISCORD_TOKEN')

bot = commands.Bot(intents=discord.Intents.all(),command_prefix='!')

@bot.command(name='add')
async def add(ctx):
    await ctx.send("Yes I am here")


bot.run(TOKEN)

